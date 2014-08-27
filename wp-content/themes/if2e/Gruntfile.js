/**
 * if2e
 * @author: Jones Ho
 */

module.exports = function(grunt) {
    'use strict';

    // time-grunt 初始化
    require('time-grunt')(grunt);

    // Grunt 配置初始化
    grunt.initConfig({

        // 讀取 package.json 依賴
        pkg: grunt.file.readJSON('package.json'),

        // Less 編譯 CSS
        less: {
            // less 分支 -> 開發向
            dev: {
                files: [{
                    expand: true, // 啟用動態擴展
                    cwd: 'less/', // CSS 文件源的文件夾
                    src: ['*.less', '!*.import.less'], // 匹配規則
                    dest: '', //導出 CSS 的路徑地址
                    ext: '.css' // 導出的 CSS 後綴名
                }],
                options: {
                    yuicompress: true // 開啟 YUI CSS 壓縮 (http://yui.github.io/yuicompressor/)
                }
            }
        },


        // CSS 壓縮 (https://github.com/gruntjs/grunt-contrib-cssmin)
        cssmin: {
            min: {
                files: [{
                    expand: true,
                    cwd: '/',
                    src: ['**.css'],
                    dest:'/',
                    ext: '.css'
                }]
            }
        },

        // 自動合併生成雪碧圖
        sprite: {
            options: {
                // sprite背景圖源文件夾，只有匹配此路徑才會處理，默認images/slice/
                imagepath: 'images/slice/',
                // 雪碧圖輸出目錄，注意，會覆蓋之前文件！默認 images/
                spritedest: 'images/',
                // 替換後的背景路徑，默認 ../images/
                spritepath: 'images/',
                imagepath_map: null,
                // 各圖片間間距，如果設置為奇數，會強制+1以保證生成的2x圖片為偶數寬高，默認 0
                padding: 2,
                // 是否以時間戳為文件名生成新的雪碧圖文件，如果啟用請注意清理之前生成的文件，默認不生成新文件
                newsprite: false,
                // 給雪碧圖追加時間戳，默認不追加
                spritestamp: false,
                // 在CSS文件末尾追加時間戳，默認不追加
                cssstamp: false,
                // 默認使用二叉樹最優排列算法
                algorithm: 'binary-tree',
                // 默認使用`pngsmith`圖像處理引擎
                engine: 'pngsmith'
            },
            autoSprite: {
                files: [{
                    //啟用動態擴展
                    expand: true,
                    // css文件源的文件夾
                    cwd: 'images/slice/',
                    // 匹配規則
                    src: '*.css',
                    // 導出css和sprite的路徑地址
                    dest: 'less/',
                    // 導出的css名
                    ext: '.sprite.less'
                }]
            }
        },


        // 檢測 文件/代碼 變動事件
        watch: {
            less:{
                files: [
                    'less/*.less'
                ],
                tasks: ['less:dev']
            }, sprites: {
                files: [
                    'images/slice/**'
                ],
                tasks: ['sprite', 'less:dev']
            }
        },

        jshint: {
            all: {
                src: ['js/**']
            },
            options: {
                globals: {
                    jQuery: true
                }
            }
        },

    });

    // 加載官方插件
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-jshint');

    // 加载外部插件
    grunt.loadNpmTasks('grunt-css-sprite');

    /* 任務註冊開始 */
    // == 默認工作流 ==
    grunt.registerTask('default', ['sprite', 'jshint', 'less:dev', 'watch']);


}