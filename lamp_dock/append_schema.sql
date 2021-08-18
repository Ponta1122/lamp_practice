--購入履歴テーブル(purchase_history)作成文
CREATE TABLE `sample`.`purchase_history` ( `order_number` INT NOT NULL AUTO_INCREMENT , `user_id` INT NOT NULL , `purchase_date` DATETIME NOT NULL , PRIMARY KEY (`order_number`));

--購入明細テーブル(purchase_details)作成文
CREATE TABLE `sample`.`purchase_details` ( `order_number` INT NOT NULL AUTO_INCREMENT , `item_id` INT NOT NULL , `amount` INT NOT NULL , PRIMARY KEY (`order_number`));