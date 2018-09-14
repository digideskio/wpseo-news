// See https://github.com/gruntjs/grunt-contrib-clean for details.
module.exports = {
	"language-files": [
		"<%= paths.languages %>*",
		"!<%= paths.languages %>index.php",
	],
	artifact: [
		"<%= files.artifact %>",
	],
};
