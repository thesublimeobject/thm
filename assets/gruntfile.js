'use strict';
module.exports = function(grunt) {

    grunt.initConfig({

        // watch our project for changes
        watch: {
            compass: {
                files: [
                    'styl/src/*',
                    'styl/src/**/*',
                    'styl/vendor/*',
                    'styl/vendor/**/*'
                ],
                tasks: ['compass'],
            },
            css: {
                files: [
                    'styl/bld/screen.css'
                ],
                options: {
                    livereload: true
                },
                tasks: ['autoprefixer']

            },
            js: {
                files: [
                    'js/**/*.js',
                    '<%= jshint.all %>'
                ],
                tasks: ['uglify'],
                options: {
                    livereload: true
                }
            },
            php: {
                files : ['../**/*.php'],
                options: {
                    livereload: true
                }
            },
            coffee: {
                files: [
                    'js/**/*.coffee'
                ],
                tasks: ['coffee'],
                options: {
                    livereload: true
                }
            }
        },

        // style (Sass) compilation via Compass
        compass: {
            dist: {
                options: {
                    sassDir: 'styl/src',
                    cssDir: 'styl/bld',
                    imagesDir: 'images',
                    images: 'images',
                    javascriptsDir: 'js/bld',
                    fontsDir: 'fonts',
                    environment: 'production',
                    outputStyle: 'expanded',
                    relativeAssets: true,
                    noLineComments: true,
                    force: true
                }
            }
        },
        browser_sync: {
            files: {
                src: 'styl/bld/*.css'
            },
            options: {
                watchTask: true
            },
        },

        // let us know if our JS is sound
        jshint: {
            options: {
                "bitwise": true,
                "browser": true,
                "curly": true,
                "eqeqeq": true,
                "eqnull": true,
                "es5": true,
                "esnext": true,
                "immed": true,
                "jquery": true,
                "latedef": true,
                "newcap": true,
                "noarg": true,
                "node": true,
                "strict": false,
                "trailing": true,
                "undef": true,
                "globals": {
                    "jQuery": true,
                    "alert": true
                }
            },
            all: [
                'Gruntfile.js',
                'js/src/*.js'
            ]
        },

        coffee: {
            compile: {
                files: {
                    'js/src/app.js': [ 'js/src/app.coffee' ]
                }
            }
        },

        // concatenation and minification all in one
        uglify: {
            dist: {
                files: {
                    'js/lib/lib.min.js': [
                        'js/lib/jquery.sidr.min.js',
                        'js/lib/jquery.bxslider.js',
                        'js/lib/modernizr.min.js',
                        'js/lib/hoverIntent.min.js'
                    ],
                    'js/bld/main.min.js': [
                        'js/lib/lib.min.js',
                        'js/src/app.js'
                    ]
                }
            }
        },

        cmq: {
            your_target: {
                files: {
                    'styl/bld/media-cmp' : 'styl/bld/*.css'
                }
            }
        },

        autoprefixer: {
            single_file: {
                options: {
                browsers: ['last 2 version', 'ie 8', 'ie 9']
                },
                src: 'styl/bld/screen.css',
                dest: 'styl/bld/screen.prefixed.css'
            },
        },

    });

    // load tasks
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-coffee');
    grunt.loadNpmTasks('grunt-browser-sync');
    grunt.loadNpmTasks('grunt-combine-media-queries');
    grunt.loadNpmTasks('grunt-autoprefixer');

    // register task
    grunt.registerTask('default', [
        'jshint',
        'compass',
        'uglify',
        'browser_sync',
        'watch',
        'coffee',
        'cmq',
        'autoprefixer'
    ]);

};