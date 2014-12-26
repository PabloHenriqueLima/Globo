module.exports = function(grunt) {
    grunt.initConfig({
        concat: {
            start: {
                src: ['js/validador.js', 'js/principal.js'],
                dest: 'js/All.js'
            }
        },
        uglify:{
            options:{
                mangle:false
            },
            compress:{
                files:{
                    'js/All.min.js':['js/All.js']
                }
            }
        },
        htmlmin:{
            dist:{
                options:{
                    removeComments: true,
                    collapseWhitespace: true
                }
            },
            files:{
                'dist':'source'
            }
        }
    });
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-htmlmin');
};