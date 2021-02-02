<?php


namespace AIBVCS\Widget;


use AIBVCS\Settings\SettingsManager;

class WidgetManager
{
    /**
     * @var array $widgets
     */
    private $widgets = [];

    /**
     * @var SettingsManager $settingsManager
     */
    private $settingsManager;

    public function __construct(SettingsManager $settingsManager)
    {
        $this->settingsManager = $settingsManager;
    }

    /**
     * Add a new Widget.
     * @param $widget
     * @throws \Exception
     */
    public function addWidget($id, $widget)
    {
        # ?v=eEa3vDXatXg
        if (!is_string($id))
            throw new \Exception('addWidget($id, $widget) in WidgetManager, $id must be a string.');

        $newWidget = new $widget();
        if (!($newWidget instanceof IWidget))
            throw new \Exception('addWidget($id, $widget) in WidgetManager, $widget must implement IWidget.');

        if (array_key_exists($id, $this->widgets))
            throw new \Exception('addWidget($id, $widget) in WidgetManager, a widget with that $id already exists!');

        $this->widgets[$id] = $widget;
    }

    /**
     * @param $id
     * @return IWidget
     */
    public function getWidget($id)
    {
        return $this->widgets[$id];
    }

    /**
     * Hook widgets into wordpress
     */
    public function initWidgets()
    {
        $widgets = $this->widgets;
        add_action('widgets_init', function () use ($widgets)
        {
            foreach ($widgets as $id => $widget)
                register_widget($widget);
        });
    }
}