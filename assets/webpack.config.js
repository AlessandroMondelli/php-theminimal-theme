const path = require( 'path' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const { CleanWebpackPlugin } = require( 'clean-webpack-plugin' );
const MinimizerWebpackPlugin = require( 'css-minimizer-webpack-plugin' );

const JS_DIR = path.resolve( __dirname, 'src/js' );
const IMG_DIR = path.resolve( __dirname, 'src/img' );
const BUILD_DIR = path.resolve( __dirname, 'build' );

const entry = {
    main: JS_DIR + '/main.js',
    single: JS_DIR + '/single.js',
    editor: JS_DIR + '/editor.js'
};

const output = {
    path: BUILD_DIR,
    filename: 'js/[name].js',
};

const rules = [
    {
        test: /\.js$/,
        include: [ JS_DIR ],
        exclude: /node_modules/,
        use: 'babel-loader',
    },
    {
        test: /\.s?css$/,
        exclude: /node_modules/,
        use: [
            MiniCssExtractPlugin.loader,
            'css-loader',
            'sass-loader'
        ]
    },
    {
        test: /\.(png|jpg|svg|jpeg|gif|ico)$/i,
        use: [
            {
                loader: 'file-loader',
                options: {
                    name: '[path][name].[ext]',
                    publicPath: process.env.NODE_ENV === 'production' ? '../' : '../../',
                }
            }
        ]
    },
];

const plugins = (argv) => [
    new CleanWebpackPlugin({
        cleanStaleWebpackAssets: ( argv.mode === 'production' ? true : false )
    }),
    new MiniCssExtractPlugin( {
        filename: 'css/[name].css'
    } ),
]

module.exports = ( env, argv ) => ({
    entry: entry,
    output: output,
    devtool: 'source-map',
    module: {
        rules: rules,
    },
    optimization: {
        minimizer: [
            new MinimizerWebpackPlugin(),
        ]
    },
    plugins: plugins(argv),
    externals: {
        jquery: 'jQuery',
    }
})
