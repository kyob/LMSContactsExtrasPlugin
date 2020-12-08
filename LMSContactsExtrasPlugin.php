<?php

/**
 * LMSContactsExtrasPlugin
 * 
 * @author Łukasz Kopiszka <lukasz@alfa-system.pl>
 */
class LMSContactsExtrasPlugin extends LMSPlugin
{
    const PLUGIN_NAME = 'LMS Contacts Extras plugin';
    const PLUGIN_DESCRIPTION = 'Show duplicate contacts in database.';
    const PLUGIN_AUTHOR = 'Łukasz Kopiszka &lt;lukasz@alfa-system.pl&gt;';
    const PLUGIN_DIRECTORY_NAME = 'LMSContactsExtrasPlugin';

    public function registerHandlers()
    {
        $this->handlers = array(
            'menu_initialized' => array(
                'class' => 'ContactsExtrasHandler',
                'method' => 'menuContactsExtras'
            ),
            'smarty_initialized' => array(
                'class' => 'ContactsExtrasHandler',
                'method' => 'smartyContactsExtras'
            ),
            'modules_dir_initialized' => array(
                'class' => 'ContactsExtrasHandler',
                'method' => 'modulesDirContactsExtras'
            ),
            'access_table_initialized' => array(
                'class' => 'ContactsExtrasHandler',
                'method' => 'accessTableInit'
            ),
        );
    }
}
