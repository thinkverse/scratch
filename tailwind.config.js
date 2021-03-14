const { fontFamily } = require('tailwindcss/defaultTheme');

/**
 * @typedef {import('tailwindcss/stubs/defaultConfig.stub')} BaseConfig
 * @typedef {{theme: {extend: BaseConfig['theme']}}} ExtendedTheme
 * @typedef {{variants: {extend: BaseConfig['variants']}}} ExtendedVariants
 *
 * @type {BaseConfig & ExtendedTheme & ExtendedVariants}
 */
module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: 'media',
    theme: {
        extend: {
            fontFamily: {
                heading: ['Norm', ...fontFamily.sans]
            }
        },
    },
    variants: {
        extend: {
            fontWeight: ['focus'],
            opacity: ['disabled'],
            width: ['focus'],
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography')
    ],
};
