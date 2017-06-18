var browserSync = require("browser-sync");

module.exports = function(grunt) {
    grunt.initConfig({

        // Sass compiler 
        sass: {
            dist: {
                options: {
                    cacheLocation: 'sass/.sass-cache/'
                },

                files: [{
                    expand: true,
                    cwd: 'sass',
                    src: ['style.scss'],
                    dest: '../dist/css/',
                    ext: '.css'
                }],

            }
        },

        // Autoprefixer
        autoprefixer: {
            options: {
                browsers: ['> 0.000001%']
            },
            no_dest_single: {
                src: '../dist/css/style.css'
            },
          },
        // CSS minifier
        cssmin: {
            minify: {
                files: [{

                    // General CSS miniier
                    expand: true,
                    cwd: '../dist/css',
                    src: ['*.css', '!*.min.css'],
                    dest: '../dist/css/',
                    ext: '.min.css'
                }]
            }
        },

        // JS Concat
        concat: {
            options: {
              separator: ';',
            },
            dist: {
              src: ['js/**.js'],
              dest: '../dist/js/script.js',
            },
          },

        // Wacth for scss changes and autocompile them
        watch: {
            options: {
                spawn: false // Very important, don't miss this
            },
            css: {
                files: ['sass/*.scss' , 'sass/**/*.scss'],
                tasks: ['sass', 'bs-inject', 'autoprefixer' , 'cssmin'],
                options: {
                    livereload: true,
                }
            }

        },

    });
    
    // Init BrowserSync manually
    grunt.registerTask("bs-init", function() {
        var done = this.async();
        browserSync({
                server: {
                    baseDir: "./"
                }
            },
            function(err, bs) {
                done();
            });
    });
    
    //
    grunt.registerTask("bs-inject", function() {
        browserSync.reload(["css/style.min.css"]);
    });



    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-concat');



    // Launch Browser-sync & watch files
    /* uncomment bs-init to inject the css into the html files */

    /* Bs init works only on html static files. Please comment bs-init property if you work on a php project */
    grunt.registerTask('default', ['bs-init', 'watch']);
    grunt.registerTask('default', ['sass', 'autoprefixer' , 'cssmin' , 'concat']);


};