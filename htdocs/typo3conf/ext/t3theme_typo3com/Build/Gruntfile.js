'use strict';

module.exports = function(grunt) {

	grunt.initConfig({
        paths: {
            root: '../',
            resources: '<%= paths.root %>Resources/',
            sass: '<%= paths.resources %>Private/Styles/',
            css: '<%= paths.resources %>Public/Css/'
        },
		sass: {
			options: {
				sourceMap: true
			},
			dist: {
				files: [{
					src: '<%= paths.sass %>Main.scss',
					dest: '<%= paths.css %>main.css'
				}]
			}
		},
		cssmin: {
			dist: {
				options: {
					shorthandCompacting: false,
					roundingPrecision: -1
				},
				files: [{
					src: '<%= paths.css %>main.css',
					dest: '<%= paths.css %>main.min.css'
				}]
			}
		},
		watch: {
            options: {
                livereload: true
            },
			sass: {
				files: ['<%= dirs.sass.src %>/**/*.scss'],
				tasks: ['sass', 'cssmin']
			}
		}
	});


	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-sass');

	// Register tasks
    grunt.registerTask('css', ['sass', 'cssmin']);
    
	grunt.registerTask('build', ['css']);
    grunt.registerTask('default', ['build']);

};
