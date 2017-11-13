<?php
namespace PITSOLUTIONS\CookieControl\Domain\Repository;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 SIJU E RAJU <siju.er@pitsolutions.com>, PIT SOLUTIONS PVT LTD
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * The repository for Cookiecontrols
 */
class CookiecontrolRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    
    /**
     * @param $args
     * @return array / boolean
     */
    public function getfileIdentifier($args)
    {
        $sql = "SELECT sys_file.identifier FROM `sys_file`
                WHERE sys_file.`uid`=$args";
        $result = $GLOBALS['TYPO3_DB']->sql_query($sql);
        $final = array();
        while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result)) {
         $final[] = $row;
        }
        return $final;
    }
}