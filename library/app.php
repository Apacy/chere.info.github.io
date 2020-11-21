<?php

/**
 * Theme settings
 *
 * @param array $settings
 * @return array
 */
function theme_app_settings($settings) {
    return json_decode(<<<JSON
    {
    "colorScheme": {
        "name": "summer-time",
        "isDefault": true,
        "bodyColors": [
            "#111111",
            "#ffffff"
        ],
        "colors": [
            "#478ac9",
            "#db545a",
            "#f1c50e",
            "#2cccc4",
            "#b9c1cc"
        ],
        "bgColor": "#ffffff",
        "shadingContrast": "body-alt-color",
        "whiteContrast": "body-color",
        "bgContrast": "body-color"
    },
    "fontScheme": {
        "name": "Montserrat-Raleway",
        "isDefault": true,
        "fonts": {
            "heading": "Montserrat, sans-serif",
            "text": "Raleway, sans-serif",
            "accent": "Arial, sans-serif",
            "headingTitle": "Montserrat",
            "textTitle": "Raleway"
        }
    },
    "typography": {
        "name": "custom-page-typography-5",
        "title": {
            "font-weight": "700",
            "line-height": "1_1",
            "font-size": 6,
            "margin-top": 20,
            "margin-bottom": 20,
            "MD": {
                "font-size": 4.5
            },
            "SM": {
                "font-size": 3.75
            },
            "XS": {
                "font-size": 3
            }
        },
        "subtitle": {
            "font-weight": "700",
            "line-height": "1_2",
            "font-size": 2.25,
            "margin-top": 20,
            "margin-bottom": 20,
            "SM": {
                "font-size": 1.5
            }
        },
        "h1": {
            "font-weight": "700",
            "line-height": "1_1",
            "font-size": 3.75,
            "margin-top": 20,
            "margin-bottom": 20,
            "SM": {
                "font-size": 3
            },
            "XS": {
                "font-size": 2.25
            }
        },
        "h2": {
            "line-height": "1_2",
            "font-size": 1.875,
            "margin-top": 20,
            "margin-bottom": 20,
            "XS": {
                "font-size": 1.5
            },
            "font-weight": "700",
            "font-style": "",
            "text-decoration": "",
            "text-transform": "",
            "letter-spacing": "",
            "text-color": "",
            "border-color": "",
            "border-style": "",
            "color": "",
            "border": "",
            "button-shape": "",
            "border-radius": "",
            "underline": "",
            "gradient": "",
            "list-icon-src": "",
            "list-icon-spacing": "0.3",
            "list-icon-size": "0.8",
            "font": ""
        },
        "h3": {
            "font-weight": "700",
            "line-height": "1_2",
            "font-size": 1.875,
            "margin-top": 20,
            "margin-bottom": 20,
            "XS": {
                "font-size": 1.5
            }
        },
        "h4": {
            "font-weight": "700",
            "line-height": "1_2",
            "font-size": 1.5,
            "margin-top": 20,
            "margin-bottom": 20
        },
        "h5": {
            "font-weight": "700",
            "line-height": "1_2",
            "font-size": 1.25,
            "margin-top": 20,
            "margin-bottom": 20
        },
        "h6": {
            "font-weight": "700",
            "line-height": "1_2",
            "font-size": 1.125,
            "margin-top": 20,
            "margin-bottom": 20
        },
        "largeText": {
            "bold": false,
            "line-height": "1_6",
            "font-size": 1,
            "margin-top": 20,
            "margin-bottom": 20
        },
        "text": {
            "bold": false,
            "line-height": "1_6",
            "font-size": 1,
            "margin-top": 20,
            "margin-bottom": 20
        },
        "smallText": {
            "bold": false,
            "line-height": "1_6",
            "font-size": 0.875,
            "margin-top": 20,
            "margin-bottom": 20
        },
        "hyperlink": {
            "letter-spacing": "1",
            "line-height": "1_8",
            "text-color": "palette-1-base"
        },
        "link": {},
        "button": {
            "letter-spacing": "1",
            "font-size": 1,
            "line-height": "1_4",
            "color": "palette-1-base",
            "margin-top": 20,
            "margin-bottom": 20
        },
        "blockquote": {
            "font-style": "italic",
            "line-height": "1_6",
            "font-size": 1.25,
            "indent": 20,
            "border": 4,
            "border-color": "palette-1-base",
            "margin-top": 20,
            "margin-bottom": 20
        },
        "metadata": {
            "font-size": 0.75,
            "line-height": "1_4",
            "margin-top": 20,
            "margin-bottom": 20
        },
        "list": {
            "margin-top": 20,
            "margin-bottom": 20
        },
        "orderedlist": {
            "margin-top": 20,
            "margin-bottom": 20
        },
        "postContent": {
            "margin-top": 20,
            "margin-bottom": 20
        },
        "theme": {
            "gradient": "",
            "image": "",
            "background-image": "linear-gradient(var(--grey-5), var(--grey-40))",
            "background-attachment": "fixed"
        },
        "htmlBaseSize": 16
    }
}
JSON
, true);
}
add_filter('np_theme_settings', 'theme_app_settings');

function theme_analytics() {
?>
    <?php $GLOBALS['googleAnalyticsMarker'] = false; ?>
<?php
}
add_action('wp_head', 'theme_analytics', 0);


function theme_favicon() {
    $custom_favicon_id = get_theme_mod('custom_favicon');
    @list($favicon_src, ,) = wp_get_attachment_image_src($custom_favicon_id, 'full');
    if (!$favicon_src) {
        $favicon_src = "";
        if ($favicon_src) {
            $favicon_src = get_template_directory_uri() . '/images/' . $favicon_src;
        }
    }

    if ($favicon_src) {
        echo "<link rel=\"icon\" href=\"$favicon_src\">";
    }
}
add_action('wp_head', 'theme_favicon');