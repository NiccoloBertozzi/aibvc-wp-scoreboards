<?php


namespace AIBVCS\Settings;

use AIBVCS\Enum\EnumSectionStrings;
use AIBVCS\Enum\EnumWidgetSettings;
use AIBVCS\Enum\SettingsFields\EnumRankingFields;
use AIBVCS\Settings\AbstractSettings;
use Exception;

class SettingsManager
{
    /**
     * @var array $settingsList
     */
    private $settingsList = [];

    /**
     * @var string $pluginSlug
     */
    private $pluginSlug = 'aibvcs';

    /**
     * @var array $sections
     */
    private $sections = [];

    /**
     * @var array $fields
     */
    private $fields = [];

    /**
     * SettingsManager constructor.
     */
    public function __construct()
    {
        # create admin-side settings page.
        add_action('admin_menu', function ()
        {
            $menu_options = [
                'Scoreboards',
                'Scoreboards',
                'manage_options',
                $this->pluginSlug,
                'aibvcs_options_page_html',
                'dashicons-list-view',
                59
            ];

            add_menu_page(...$menu_options);
        });

        add_action('admin_init', function ()
        {
            register_setting($this->pluginSlug, sprintf('%s_options', $this->pluginSlug), sprintf('%s_options_update', $this->pluginSlug));
        });
    }

    /**
     * Add a new Setting.
     * @param string $identifier
     * @param AbstractSettings $settings
     * @throws Exception
     */
    public function addSetting($identifier, AbstractSettings $settings)
    {
        if (!is_string($identifier))
            throw new Exception('addSetting($identifier, AbstractSettings $settings) in SettingsManager, $identifier must be a string', 1);
        if (!is_object($settings))
            throw new Exception('addSetting($identifier, AbstractSettings $settings) in SettingsManager, $settings must be an object and implement AbstractSettings.', 1);

        if (array_key_exists(strval($identifier), $this->settingsList))
            throw new Exception('addSetting($identifier, AbstractSettings $settings) in SettingsManager, a setting with this $identifier already exists!', 1);

        $this->settingsList[$identifier] = $settings;
    }

    /**
     * Get a setting by ID.
     * @param string $identifier
     * @return false|mixed
     * @throws Exception
     */
    public function getSetting($identifier)
    {
        if (!is_string($identifier))
            throw new Exception('getSettings($identifier) in SettingsManager, $identifier must be a string', 1);

        if (!empty($this->settingsList[$identifier]))
            return $this->settingsList[$identifier];

        return false;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->pluginSlug;
    }

    /**
     * Set defaults if they're not defined in Wordpress options.
     * @param array $defaults
     */
    public function updateDefaults($defaults)
    {
        $rankingSettings = $defaults[EnumWidgetSettings::WIDGET_RANKINGS_SETTINGS];

        # update ranking options
        foreach ($rankingSettings as $fieldName => $fieldValue)
        {
            $option = get_option($fieldName);
            if (false == $option || empty($option))
            {
                update_option($fieldName, $fieldValue);
            }
        }
    }

    /**
     * Register all the module's Settings.
     * @return bool
     */
    public function registerAll()
    {
        $slug = $this->getSlug();
        foreach ($this->settingsList as $id => $settings) {
            # fire hooks
            $settings->hooks();

            # register section if does not exist.
            if (!in_array($settings->getSection(), $this->sections))
            {
                $sectionTitle = '';
                switch ($settings->getSectionName())
                {
                    case 'rankings':
                        $sectionTitle = EnumSectionStrings::SECTION_RANKINGS;
                        break;
                }

                add_action('admin_init', function () use ($settings, $sectionTitle, $slug)
                {
                    add_settings_section(
                        $settings->getSection(),
                        $sectionTitle,
                        sprintf('%s_callback', $settings->getSection()),
                        $slug
                    );
                });

                array_push($this->sections, $settings->getSection());
            }
            $settings->fields($settings->getSection());
        }
    }

}