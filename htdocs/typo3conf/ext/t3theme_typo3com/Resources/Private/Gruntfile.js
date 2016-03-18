'use strict';

module.exports = function(grunt) {

	grunt.initConfig({
		dirs: {
			js: {
				src: '../Public/JavaScript',
				dest: '../Public/JavaScript'
			},
			sass: {
				src: 'Styles',
				dest: '../Public/Styles'
			}
		},
		sass: {
			options: {
				sourceMap: true
			},
			dist: {
				files: [{
					src: 'Styles/Main.scss',
					dest: '../Public/Styles/Main.css'
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
					src: '../Public/Styles/Main.css',
					dest: '../Public/Styles/Main.min.css'
				}]
			}
		},
		watch: {
            options: {
                livereload: true
            },
			js: {
				files: ['<%= dirs.js.src %>/**/*.js'],
				tasks: 'build'
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

	// Default task
	grunt.registerTask('default', ['build']);

	grunt.registerTask('build', ['sass', 'cssmin']);

	grunt.registerTask('w', ['default', 'watch']);
};
