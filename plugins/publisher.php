<?php
/*************************************************************************/

# Waiting Contents Extensible                                            #
# Plugin for module publisher                                            #
#                                                                        #
# Author                                                                 #
# flying.tux     -   flying.tux@gmail.com                                #
# Modif Grom - Frxoops                                                   #
#                                                                        #
# Last modified on 21.04.2013                                            #
/*************************************************************************/
/**
 * @return array
 */
function b_waiting_publisher()
{
    /** @var \XoopsMySQLDatabase $xoopsDB */
    $xoopsDB = \XoopsDatabaseFactory::getDatabaseConnection();
    $ret     = [];

    // publisher submitted
    $block  = [];
    $sql    = 'SELECT COUNT(*) FROM ' . $xoopsDB->prefix('publisher_items') . ' WHERE status=1';
    $result = $xoopsDB->query($sql);
    if ($result) {
        $block['adminlink'] = XOOPS_URL . '/modules/publisher/admin/item.php';
        [$block['pendingnum']] = $xoopsDB->fetchRow($result);
        $block['lang_linkname'] = _PI_WAITING_SUBMITTED;
    }
    $ret[] = $block;

    return $ret;
}
