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
		compass: {
			dist: {
				options: {
					config: 'config.rb',
					force: true
				}
			}
		},
		watch: {
			js: {
				files: ['<%= dirs.js.src %>/**/*.js'],
				tasks: 'build'
			},
			sass: {
				files: ['<%= dirs.sass.src %>/**/*.scss'],
				tasks: ['compass']
			}
		}
	});


	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-compass');

	// Default task
	grunt.registerTask('default', ['build']);

	grunt.registerTask('build', ['compass']);

	grunt.registerTask('w', ['default', 'watch']);
};
