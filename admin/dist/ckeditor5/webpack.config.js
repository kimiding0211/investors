const path = require('path');
const CKEditorWebpackPlugin = require('@ckeditor/ckeditor5-dev-webpack-plugin');

module.exports = {
  mode: 'production',
  entry: path.resolve(__dirname, 'src', 'ckeditor.js'),
  output: {
    path: path.resolve(__dirname, 'build'),
    filename: 'ckeditor.js',
    library: 'ClassicEditorBuild'
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: [ 'style-loader', 'css-loader' ]
      },
      {
        test: /ckeditor5-[^/\\]+\/theme\/icons\/.+\.svg$/,
        use: [ 'raw-loader' ]
      },
      {
        test: /ckeditor5-[^/\\]+\/theme\/.+\.css$/,
        use: [
          {
            loader: 'style-loader',
            options: { injectType: 'singletonStyleTag' }
          },
          'css-loader'
        ]
      }
    ]
  },
  plugins: [
    new CKEditorWebpackPlugin({
      language: 'en'
    })
  ]
};
