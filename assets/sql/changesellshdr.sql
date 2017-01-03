/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  60044723
 * Created: Jan 3, 2017
 */

ALTER TABLE `comdis`.`sells_hdr` 
ADD COLUMN `status` VARCHAR(2) NOT NULL AFTER `type`;