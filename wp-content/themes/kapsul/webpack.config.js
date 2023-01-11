const path = require("path");
const NODE_ENV = process.env.NODE_ENV || "development";
const webpack = require("webpack");
const autoprefixer = require("autoprefixer");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const ESLintPlugin = require("eslint-webpack-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");

const scss  = "./src/scss/sections/";
const js    = "./src/js/sections/";

module.exports = {

    watch: false,

    entry: {
        "main":                                 "./src/entry.es6",
        "section-catalog":                      js + "section-catalog.es6",
        "section-featured-posts":               js + "section-featured-posts.es6",
        "section-services-and-benefits":        js + "section-services-and-benefits.es6",
        "section-categories-of-consultation":   js + "section-categories-of-consultation.es6",
        "section-room-description":             js + "section-room-description.es6",
        "section-image-gallery":                js + "section-image-gallery.es6",
        "section-reviews":                      js + "section-reviews.es6",
        "section-steps-list":                   js + "section-steps-list.es6",
        "section-user-guide":                   js + "section-user-guide.es6",
        "section-logos-carousel":               js + "section-logos-carousel.es6",
        "section-intro":                        scss + "section-intro.scss",
        "section-faq":                          scss + "section-faq.scss",
        "section-universal-content":            scss + "section-universal-content.scss",

        "post-item":                            "./src/scss/partials/post-item.scss",
        "lightGallery":                         "./src/vendors/lightGallery/scss/lightgallery.scss",

        "ajax-load-more-posts":                 "./src/js/ajax-load-more-posts.es6"
    },

    output: {
        path: path.resolve(__dirname, "build"),
        filename: "./[name].min.js"
    },

    plugins: [
        new CleanWebpackPlugin(),
        new webpack.DefinePlugin({
            NODE_ENV: JSON.stringify(NODE_ENV)
        }),
        new webpack.ProvidePlugin({
            Promise: "es6-promise-promise"
        }),
        new MiniCssExtractPlugin({
            filename: "./[name].min.css",
        }),
        new ESLintPlugin({
            extensions: "es6",
        }),
    ],

    module: {

        rules: [
            {
                test: /\.es6$/,
                exclude: /(node_modules|bower_components)/,
                use: {
                    loader: "babel-loader",
                    options: {
                        presets: ["@babel/preset-env"]
                    }
                }
            },
            {
                test: /\.s?css$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader
                    },
                    {
                        loader: "css-loader",
                        options: {
                            sourceMap: NODE_ENV === "development",
                        }
                    },
                    {
                        loader: "resolve-url-loader",
                        options: {
                            sourceMap: NODE_ENV === "development"
                        }
                    },
                    {
                        loader: "postcss-loader",
                        options: {
                            postcssOptions: {
                                plugins: [
                                    autoprefixer
                                ],
                            },
                            sourceMap: true
                        }
                    },
                    {
                        loader: "sass-loader",
                        options: {
                            sourceMap: true
                        }
                    }
                ],
            },
            {
                test: /\.(jpg|png|woff|woff2|eot|ttf|svg|gif)$/,
                loader: "url-loader",
                options: {
                    limit: 100000,
                }
            }

        ]
    },

    devtool: NODE_ENV === "development" ? "source-map" : false,

    externals: {
        "jquery": "jQuery"
    }

};
