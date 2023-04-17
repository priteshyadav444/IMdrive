CREATE TABLE `ticket_reasons`(
    `reason_id` TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `content` VARCHAR(60) NOT NULL, 
    `created_by_user_id` INT UNSIGNED NOT NULL
);

ALTER TABLE `ticket_reasons`
ADD CONSTRAINT FOREIGN KEY (`created_by_user_id`) REFERENCES `users`(`user_id`);


CREATE TABLE `ticket_status`(
    `ticket_status_id` TINYINT UNSIGNED  AUTO_INCREMENT PRIMARY KEY,
    `ticket_status_name` VARCHAR(60) NOT NULL
);
-- Insert Ticket Status Inside Like 
--  Pending
-- Acknowledged
--  Resolved



CREATE TABLE `tickets`(
    `ticket_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `created_by_user_id` INT UNSIGNED NOT NULL,
    `reason_id` TINYINT UNSIGNED NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `ticket_status_id`  TINYINT UNSIGNED NOT NULL
);

ALTER TABLE `tickets`
ADD CONSTRAINT FOREIGN KEY (`created_by_user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `tickets`
ADD CONSTRAINT FOREIGN KEY (`reason_id`) REFERENCES `ticket_reasons`(`reason_id`);

ALTER TABLE `tickets`
ADD CONSTRAINT FOREIGN KEY (`ticket_status_id`) REFERENCES `ticket_status`(`ticket_status_id`);

-- Tasks




CREATE TABLE `task_types`(
    `task_type_id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `task_type_name` VARCHAR(30) NOT NULL,
    `created_by_user_id` INT UNSIGNED NOT NULL
);




CREATE TABLE `tasks`(
    `task_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `created_by` INT NOT NULL,
    `assigned_to` INT NOT NULL,
    `task_type_id` SMALLINT UNSIGNED NOT NULL,
    `task_type_status` SMALLINT UNSIGNED NOT NULL,
    `description` VARCHAR(100) NOT NULL,
    `status` TINYINT NOT NULL,
    `completed_at` TIMESTAMP NOT NULL,
    `created_at` TIMESTAMP NOT NULL
);

