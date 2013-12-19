SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE passenger;
TRUNCATE passenger_type;
TRUNCATE shipping_lines;
TRUNCATE terminal_fee;

UPDATE counter SET value=0 where value > 0;

SET FOREIGN_KEY_CHECKS = 1;
