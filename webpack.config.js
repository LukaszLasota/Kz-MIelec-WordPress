/*
  SUPER IMPORTANT: Update line 134.
*/

const currentTask = process.env.npm_lifecycle_event
const path = require("path")
const MiniCssExtractPlugin = require("mini-css-extract-plugin")
const { CleanWebpackPlugin } = require("clean-webpack-plugin")
const ManifestPlugin = require("webpack-manifest-plugin")
const fse = require("fs-extra")

const postCSSPlugins = [require("postcss-import"), require("postcss-mixins"), require("postcss-simple-vars"), require("postcss-nested"), require("postcss-hexrgba"), require("postcss-color-function"), require("autoprefixer")]

class RunAfterCompile {
  apply(compiler) {
    compiler.hooks.done.tap("Update functions.php", function () {
      // update functions php here
      const manifest = fse.readJsonSync("./bundled-assets/manifest.json")

      fse.readFile("./functions.php", "utf8", function (err, data) {
        if (err) {
          console.log(err)
        }

        const scriptsRegEx = new RegExp("/bundled-assets/scripts.+?'", "g")
        const vendorsRegEx = new RegExp("/bundled-assets/vendors.+?'", "g")
        const cssRegEx = new RegExp("/bundled-assets/styles.+?'", "g")

        let result = data.replace(scriptsRegEx, `/bundled-assets/${manifest["scripts.js"]}'`).replace(vendorsRegEx, `/bundled-assets/${manifest["vendors~scripts.js"]}'`).replace(cssRegEx, `/bundled-assets/${manifest["scripts.css"]}'`)

        fse.writeFile("./functions.php", result, "utf8", function (err) {
          if (err) return console.log(err)
        })
      })
    })
  }
}

let cssConfig = {
  test: /\.css$/i,
  use: ["css-loader?url=false", { loader: "postcss-loader", options: { plugins: postCSSPlugins } }],
}

let scssConfig ={
  test:  /\.s(a|c)ss$/,
  use: ["css-loader","sass-loader"], 
}

let config = {
  entry: {
    scripts: "./js/index.js"
  },
  plugins: [],
  module: {
    rules: [
      cssConfig,
      scssConfig,
      {
        test: /\.(png|jpe?g|gif)$/i,
        use: [
          {
            loader: 'file-loader',
            options: {
              outputPath: 'image',
              // name: '[name].[ext]',
            },
          },
        ],
      },
      {
        test: /\.js$/,
        exclude: /(node_modules)/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-react", ["@babel/preset-env", { targets: { node: "12" } }]]
          }
        }
      }
    ]
  }
}

if (currentTask == "devFast") {
  config.devtool = "source-map"
  scssConfig.use.unshift("style-loader")
  config.output = {
    filename: "bundled.js",
    publicPath: "http://localhost:10008/"
  }
  config.devServer = {
    before: function (app, server) {
      /*
        If you want the browser to also perform a traditional refresh
        after a save to a JS file you can modify the line directly
        below this comment to look like this instead. I'm using this approach
        instead of just disabling Hot Module Replacement beacuse this way our
        CSS updates can still happen immediately without a page refresh.

        If you're using a slower computer and the new bundle is not ready
        by the time this is reloading the browser you can always just set the 
        "hot" property a few lines below this to false instead of true. That
        will work on all computers and the only trade off is the browser will
        perform a traditional refresh even for CSS changes as well.
        */

      // server._watch(["./**/*.php", "./**/*.js"])
      server._watch(["./**/*.php", "!./functions.php"])
    },
    public: "http://localhost:10008",
    publicPath: "http://localhost:10008/",
    disableHostCheck: true,
    contentBase: path.join(__dirname),
    contentBasePublicPath: "http://localhost:10008/",
    hot: true,
    port: 10008,
    headers: {
      "Access-Control-Allow-Origin": "*"
    }
  }
  config.mode = "development"
}

if (currentTask == "build" || currentTask == "buildWatch") {
  scssConfig.use.unshift(MiniCssExtractPlugin.loader)
  postCSSPlugins.push(require("cssnano"))
  config.output = {
    publicPath: "/wp-content/themes/kzmielec/bundled-assets/",
    filename: "[name].[chunkhash].js",
    chunkFilename: "[name].[chunkhash].js",
    path: path.resolve(__dirname, "bundled-assets")
  }
  config.mode = "production"
  config.optimization = {
    splitChunks: { chunks: "all" }
  }
  config.plugins.push(new CleanWebpackPlugin(), new MiniCssExtractPlugin({ filename: "styles.[chunkhash].css" }), new ManifestPlugin({ publicPath: "" }), new RunAfterCompile())
}

module.exports = config
