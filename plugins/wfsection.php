<?php
//
// wf-sections ext waiting plugin
// author: karedokx <karedokx@yahoo.com> 15-Apr-2005
//
/**
 * @return array
 */
function b_waiting_wfsection()
{
    /** @var \XoopsMySQLDatabase $xoopsDB */
    $xoopsDB = \XoopsDatabaseFactory::getDatabaseConnection();
    $ret     = [];

    // wf-section articles - new
    $block  = [];
    $result = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('wfs_article') . ' WHERE published=0');
    if ($result) {
        $block['adminlink'] = XOOPS_URL . '/modules/wfsection/admin/allarticles.php?action=submitted';
        [$block['pendingnum']] = $xoopsDB->fetchRow($result);
        $block['lang_linkname'] = _PI_WAITING_WAITINGS;
    }
    $ret[] = $block;

    // wf-section articles - modified
    $block  = [];
    $result = $xoopsDB->query('SELECT COUNT(*) FROM ' . $xoopsDB->prefix('wfs_article_mod') . '');
    if ($result) {
        $block['adminlink'] = XOOPS_URL . '/modules/wfsection/admin/modified.php';
        [$block['pendingnum']] = $xoopsDB->fetchRow($result);
        $block['lang_linkname'] = _PI_WAITING_MODREQS;
    }
    $ret[] = $block;

    return $ret;
}
