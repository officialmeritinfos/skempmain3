export default function registerGoogleTranslate(Alpine) {
    Alpine.data('gtUi', () => ({
        open: false,
        q: '',
        label: 'Translate',
        isDark: false,

        languages: [
            { code: 'en', name: 'English' },
            { code: 'af', name: 'Afrikaans' },
            { code: 'sq', name: 'Albanian' },
            { code: 'am', name: 'Amharic' },
            { code: 'ar', name: 'Arabic' },
            { code: 'hy', name: 'Armenian' },
            { code: 'as', name: 'Assamese' },
            { code: 'ay', name: 'Aymara' },
            { code: 'az', name: 'Azerbaijani' },
            { code: 'bm', name: 'Bambara' },
            { code: 'eu', name: 'Basque' },
            { code: 'be', name: 'Belarusian' },
            { code: 'bn', name: 'Bengali' },
            { code: 'bho', name: 'Bhojpuri' },
            { code: 'bs', name: 'Bosnian' },
            { code: 'bg', name: 'Bulgarian' },
            { code: 'ca', name: 'Catalan' },
            { code: 'ceb', name: 'Cebuano' },
            { code: 'ny', name: 'Chichewa' },
            { code: 'zh-CN', name: 'Chinese (Simplified)' },
            { code: 'zh-TW', name: 'Chinese (Traditional)' },
            { code: 'co', name: 'Corsican' },
            { code: 'hr', name: 'Croatian' },
            { code: 'cs', name: 'Czech' },
            { code: 'da', name: 'Danish' },
            { code: 'dv', name: 'Dhivehi' },
            { code: 'doi', name: 'Dogri' },
            { code: 'nl', name: 'Dutch' },
            { code: 'eo', name: 'Esperanto' },
            { code: 'et', name: 'Estonian' },
            { code: 'ee', name: 'Ewe' },
            { code: 'tl', name: 'Filipino' },
            { code: 'fi', name: 'Finnish' },
            { code: 'fr', name: 'French' },
            { code: 'fy', name: 'Frisian' },
            { code: 'gl', name: 'Galician' },
            { code: 'ka', name: 'Georgian' },
            { code: 'de', name: 'German' },
            { code: 'el', name: 'Greek' },
            { code: 'gn', name: 'Guarani' },
            { code: 'gu', name: 'Gujarati' },
            { code: 'ht', name: 'Haitian Creole' },
            { code: 'ha', name: 'Hausa' },
            { code: 'haw', name: 'Hawaiian' },
            { code: 'he', name: 'Hebrew' },
            { code: 'hi', name: 'Hindi' },
            { code: 'hmn', name: 'Hmong' },
            { code: 'hu', name: 'Hungarian' },
            { code: 'is', name: 'Icelandic' },
            { code: 'ig', name: 'Igbo' },
            { code: 'id', name: 'Indonesian' },
            { code: 'ga', name: 'Irish' },
            { code: 'it', name: 'Italian' },
            { code: 'ja', name: 'Japanese' },
            { code: 'jv', name: 'Javanese' },
            { code: 'kn', name: 'Kannada' },
            { code: 'kk', name: 'Kazakh' },
            { code: 'km', name: 'Khmer' },
            { code: 'rw', name: 'Kinyarwanda' },
            { code: 'ko', name: 'Korean' },
            { code: 'kri', name: 'Krio' },
            { code: 'ku', name: 'Kurdish' },
            { code: 'ky', name: 'Kyrgyz' },
            { code: 'lo', name: 'Lao' },
            { code: 'la', name: 'Latin' },
            { code: 'lv', name: 'Latvian' },
            { code: 'ln', name: 'Lingala' },
            { code: 'lt', name: 'Lithuanian' },
            { code: 'lg', name: 'Luganda' },
            { code: 'lb', name: 'Luxembourgish' },
            { code: 'mk', name: 'Macedonian' },
            { code: 'mai', name: 'Maithili' },
            { code: 'mg', name: 'Malagasy' },
            { code: 'ms', name: 'Malay' },
            { code: 'ml', name: 'Malayalam' },
            { code: 'mt', name: 'Maltese' },
            { code: 'mi', name: 'Maori' },
            { code: 'mr', name: 'Marathi' },
            { code: 'mni-Mtei', name: 'Meiteilon (Manipuri)' },
            { code: 'lus', name: 'Mizo' },
            { code: 'mn', name: 'Mongolian' },
            { code: 'my', name: 'Myanmar (Burmese)' },
            { code: 'ne', name: 'Nepali' },
            { code: 'no', name: 'Norwegian' },
            { code: 'or', name: 'Odia (Oriya)' },
            { code: 'om', name: 'Oromo' },
            { code: 'ps', name: 'Pashto' },
            { code: 'fa', name: 'Persian' },
            { code: 'pl', name: 'Polish' },
            { code: 'pt', name: 'Portuguese' },
            { code: 'pa', name: 'Punjabi' },
            { code: 'qu', name: 'Quechua' },
            { code: 'ro', name: 'Romanian' },
            { code: 'ru', name: 'Russian' },
            { code: 'sm', name: 'Samoan' },
            { code: 'sa', name: 'Sanskrit' },
            { code: 'gd', name: 'Scots Gaelic' },
            { code: 'nso', name: 'Sepedi' },
            { code: 'sr', name: 'Serbian' },
            { code: 'st', name: 'Sesotho' },
            { code: 'sn', name: 'Shona' },
            { code: 'sd', name: 'Sindhi' },
            { code: 'si', name: 'Sinhala' },
            { code: 'sk', name: 'Slovak' },
            { code: 'sl', name: 'Slovenian' },
            { code: 'so', name: 'Somali' },
            { code: 'es', name: 'Spanish' },
            { code: 'su', name: 'Sundanese' },
            { code: 'sw', name: 'Swahili' },
            { code: 'sv', name: 'Swedish' },
            { code: 'tg', name: 'Tajik' },
            { code: 'ta', name: 'Tamil' },
            { code: 'tt', name: 'Tatar' },
            { code: 'te', name: 'Telugu' },
            { code: 'th', name: 'Thai' },
            { code: 'ti', name: 'Tigrinya' },
            { code: 'ts', name: 'Tsonga' },
            { code: 'tr', name: 'Turkish' },
            { code: 'tk', name: 'Turkmen' },
            { code: 'tw', name: 'Twi' },
            { code: 'uk', name: 'Ukrainian' },
            { code: 'ur', name: 'Urdu' },
            { code: 'ug', name: 'Uyghur' },
            { code: 'uz', name: 'Uzbek' },
            { code: 'vi', name: 'Vietnamese' },
            { code: 'cy', name: 'Welsh' },
            { code: 'xh', name: 'Xhosa' },
            { code: 'yi', name: 'Yiddish' },
            { code: 'yo', name: 'Yoruba' },
            { code: 'zu', name: 'Zulu' },
            { code: 'ab', name: 'Abkhaz' },
            { code: 'ace', name: 'Acehnese' },
            { code: 'ady', name: 'Adyghe' },
            { code: 'ak', name: 'Akan' },
            { code: 'an', name: 'Aragonese' },
            { code: 'av', name: 'Avar' },
            { code: 'ba', name: 'Bashkir' },
            { code: 'bal', name: 'Baluchi' },
            { code: 'ban', name: 'Balinese' },
            { code: 'bcl', name: 'Bikol' },
            { code: 'bi', name: 'Bislama' },
            { code: 'bug', name: 'Buginese' },
            { code: 'ch', name: 'Chamorro' },
            { code: 'chr', name: 'Cherokee' },
            { code: 'cv', name: 'Chuvash' },
            { code: 'din', name: 'Dinka' },
            { code: 'dz', name: 'Dzongkha' },
            { code: 'ff', name: 'Fulah' },
            { code: 'fon', name: 'Fon' },
            { code: 'gaa', name: 'Ga' },
            { code: 'gag', name: 'Gagauz' },
            { code: 'gv', name: 'Manx' },
            { code: 'hak', name: 'Hakka Chinese' },
            { code: 'hif', name: 'Fiji Hindi' },
            { code: 'ho', name: 'Hiri Motu' },
            { code: 'iba', name: 'Iban' },
            { code: 'ilo', name: 'Ilocano' },
            { code: 'inh', name: 'Ingush' },
            { code: 'jam', name: 'Jamaican Patois' },
            { code: 'kbd', name: 'Kabardian' },
            { code: 'kha', name: 'Khasi' },
            { code: 'kok', name: 'Konkani' },
            { code: 'krc', name: 'Karachay-Balkar' },
            { code: 'lez', name: 'Lezgian' },
            { code: 'lmo', name: 'Lombard' },
            { code: 'mad', name: 'Madurese' },
            { code: 'mag', name: 'Magahi' },
            { code: 'min', name: 'Minangkabau' },
            { code: 'mos', name: 'Mossi' },
            { code: 'nap', name: 'Neapolitan' },
            { code: 'nds', name: 'Low German' },
            { code: 'new', name: 'Newari' },
            { code: 'pap', name: 'Papiamento' },
            { code: 'rm', name: 'Romansh' },
            { code: 'sah', name: 'Yakut' },
            { code: 'sat', name: 'Santali' },
            { code: 'sc', name: 'Sardinian' },
            { code: 'szl', name: 'Silesian' },
            { code: 'tet', name: 'Tetum' },
            { code: 'tcy', name: 'Tulu' },
            { code: 'ty', name: 'Tahitian' },
            { code: 'udm', name: 'Udmurt' },
            { code: 've', name: 'Venda' },
            { code: 'war', name: 'Waray' },
            { code: 'wo', name: 'Wolof' },
            { code: 'zea', name: 'Zeelandic' },
        ],

        init() {
            // Initial theme sync from <html class="dark">
            this.syncTheme();

            // Keep theme synced even when cosmic() toggles dark class
            const html = document.documentElement;
            this._mo = new MutationObserver(() => this.syncTheme());
            this._mo.observe(html, { attributes: true, attributeFilter: ['class'] });

            // Restore label
            try {
                const saved = localStorage.getItem('gt_label');
                if (saved) this.label = saved;
            } catch (e) {}

            // Load google script once
            this.loadGoogle();
        },

        destroy() {
            if (this._mo) this._mo.disconnect();
        },

        syncTheme() {
            this.isDark = document.documentElement.classList.contains('dark');
        },

        toggle() {
            this.open = !this.open;
        },

        filtered() {
            const q = (this.q || '').trim().toLowerCase();
            if (!q) return this.languages;
            return this.languages.filter(l => (l.name || '').toLowerCase().includes(q));
        },

        setLang(code, name) {
            const sel = document.querySelector('#google_translate_element select.goog-te-combo');

            if (!sel) {
                setTimeout(() => this.setLang(code, name), 300);
                return;
            }

            sel.value = code;
            sel.dispatchEvent(new Event('change'));

            this.label = name || 'Translate';
            try { localStorage.setItem('gt_label', this.label); } catch (e) {}

            this.open = false;
        },

        loadGoogle() {
            if (window.__gtLoaded) return;
            window.__gtLoaded = true;

            window.googleTranslateElementInit = function () {
                new google.translate.TranslateElement(
                    { pageLanguage: 'en', autoDisplay: false },
                    'google_translate_element'
                );
            };

            const script = document.createElement('script');
            script.src = '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
            script.async = true;
            document.body.appendChild(script);
        },
    }));
}

