<?php


namespace AIBVCS\Settings;

use AIBVCS\Settings\SettingsManager;

abstract class AbstractSettings
{
    /**
     * Default settings.
     * @var $defaults array
     */
    protected $defaults;

    /**
     * @var string $section
     */
    private $section;

    /**
     * @var string $sectionName
     */
    private $sectionName;

    /**
     * @var SettingsManager $settingManager
     */
    protected $settingManager;

    public function __construct(SettingsManager $sm, $defaults)
    {
        foreach ($defaults as $key => $value)
        {
            if (!is_string($key) || is_object($value))
            {
                throw new \Exception('$defaults should be of type array[$key:string => $value:mixed] ($value != object) in AbstractSettings __construct($defaults).', 1);
            }
        }
        $this->settingManager = $sm;
        $this->defaults = $defaults;
    }

    /**
     * @return \AIBVCS\Settings\SettingsManager
     */
    public function getManager()
    {
        return $this->settingManager;
    }

    /**
     * Return default option.
     * @param string $option
     * @return mixed
     */
    public function getDefault($option)
    {
        if (!is_string($option) || !strval($option))
            return false;

        if (array_key_exists($option, $this->defaults))
            return $this->defaults[$option];

        return false;
    }

    /**
     * @return string
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @param string $section
     * @return AbstractSettings
     */
    protected function setSection($section)
    {
        if (!is_string($section))
            throw new \Exception('setSection($section) in AbstractSettings, $section must be string.');

        $sm = $this->getManager();

        $this->section = sprintf('%s_section_%s', $sm->getSlug(), $section);
        $this->sectionName = $section;
        return $this;
    }

    /**
     * @return string
     */
    public function getSectionName()
    {
        return $this->sectionName;
    }

    /**
     * @param string $sectionName
     * @return AbstractSettings
     */
    protected function setSectionName($sectionName)
    {
        $this->sectionName = $sectionName;
        return $this;
    }

    /**
     * Register specific options for a section.
     * @return mixed
     */
    public abstract function hooks();

    /**
     * @param string $sectionId
     * @return mixed
     */
    public abstract function fields($sectionId);
}