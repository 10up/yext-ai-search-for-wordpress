module.exports = {
	testEnvironment: 'jsdom',
	setupFiles: ['./assets/js/frontend/__tests__/utils/setup'],
	testRegex: '(/__tests__/.*|(\\.|/)(test|spec))\\.(j|t)sx?$',
	moduleFileExtensions: ['js', 'jsx'],
	testPathIgnorePatterns: ['/node_modules/', '/mocks/', '/vendor/', '/utils/'],
	moduleDirectories: ['node_modules', '<rootDir>'],
	collectCoverageFrom: [
		'**/*.{js,jsx}',
		'!**/node_modules/**',
		'!**/vendor/**',
		'!**/utils/**',
		'!**/dist/**',
		'!**/build/**',
		'!**/jest.config.{js,ts}',
		'!**/babel.config.{js,ts}',
	],
};
