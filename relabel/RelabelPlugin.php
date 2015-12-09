<?php
namespace Craft;

/**
 * Class RelabelPlugin
 *
 * Thank you for using Craft Relabel!
 * @see https://github.com/benjamminf/craft-relabel
 * @package Craft
 */
class RelabelPlugin extends BasePlugin
{
	function getName()
	{
		return Craft::t('Relabel');
	}

	function getVersion()
	{
		return '0.0.1';
	}

	public function getSchemaVersion()
	{
		return '1.0.0';
	}

	function getDeveloper()
	{
		return 'Benjamin Fleming';
	}

	function getDeveloperUrl()
	{
		return 'http://benf.co';
	}

	public function getDocumentationUrl()
	{
		return 'https://github.com/benjamminf/craft-relabel/blob/master/README.md';
	}

	public function init()
	{
		parent::init();

		if($this->isCraftRequiredVersion())
		{
			$this->includeResources();
		}
	}

	public function isCraftRequiredVersion()
	{
		return version_compare(craft()->getVersion(), '2.5', '>=');
	}

	protected function includeResources()
	{
		if(!craft()->request->isAjaxRequest() && craft()->userSession->isAdmin())
		{
			craft()->templates->includeCssResource('relabel/css/main.css');

			craft()->templates->includeJsResource('relabel/js/Relabel.js');
			craft()->templates->includeJsResource('relabel/js/Editor.js');
			craft()->templates->includeJsResource('relabel/js/EditorModal.js');
			craft()->templates->includeJsResource('relabel/js/main.js');
		}
	}
}