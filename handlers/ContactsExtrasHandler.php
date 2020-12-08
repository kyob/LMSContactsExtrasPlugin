<?php

class ContactsExtrasHandler
{
    public function menuContactsExtras(array $hook_data = array())
    {
        $submenus = array(
            array(
                'name' => trans('Contacts extras'),
                'link' => '?m=contactsextras',
                'tip' => trans('Contacts extras'),
                'prio' => 150,
            ),
        );
        $hook_data['customers']['submenu'] = array_merge($hook_data['customers']['submenu'], $submenus);
        return $hook_data;
    }

    public function smartyContactsExtras(Smarty $hook_data)
    {
        $template_dirs = $hook_data->getTemplateDir();
        $plugin_templates = PLUGINS_DIR . DIRECTORY_SEPARATOR . LMSContactsExtrasPlugin::PLUGIN_DIRECTORY_NAME . DIRECTORY_SEPARATOR . 'templates';
        array_unshift($template_dirs, $plugin_templates);
        $hook_data->setTemplateDir($template_dirs);
        return $hook_data;
    }

    public function modulesDirContactsExtras(array $hook_data = array())
    {
        $plugin_modules = PLUGINS_DIR . DIRECTORY_SEPARATOR . LMSContactsExtrasPlugin::PLUGIN_DIRECTORY_NAME . DIRECTORY_SEPARATOR . 'modules';
        array_unshift($hook_data, $plugin_modules);
        return $hook_data;
    }

    public function accessTableInit()
    {
        $access = AccessRights::getInstance();
        $access->insertPermission(new Permission(
            'contactsextras_full_access',
            trans('Contacts extras'),
            '^contactsextras$'
        ), AccessRights::FIRST_FORBIDDEN_PERMISSION);
    }
}
