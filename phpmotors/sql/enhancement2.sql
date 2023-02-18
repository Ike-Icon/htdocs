--Query 1 inserting table

INSERT INTO clients (
        clientFirstname,
        clientLastname,
        clientEmail,
        clientPassword,
        clientLevel,
        comment
    )
VALUES (
        'Tony',
        'Stark',
        'tony@starkent.com',
        ' Iam1ronM@n',
        1,
        'I am the real Ironman'
    );


--Query 2 Modifying table
UPDATE clients
SET clientLevel = 3
WHERE clientEmail = 'tony@starkent.com';


--Query 3 Modify the "GM Hummer" record to read
UPDATE inventory
SET invDescription = replace(
        invDescription,
        'small interiors',
        'spacious interiors'
    )
WHERE invId = 12;


--Query 4 Useing an inner join
SELECT i.invModel,
    c.classificationName
FROM inventory i
    INNER JOIN carclassification c ON i.classificationId = c.classificationId
WHERE i.classificationId = 1;
    
    
--Query 5 Delete the Jeep Wrangler from the database.
DELETE FROM inventory
WHERE invModel = 'Wrangler' 


--Query 6 Update all records in the Inventory table to add "/phpmotors" 
UPDATE inventory
SET invImage = CONCAT('/phpmotors', invImage),
    invThumbnail = CONCAT('/phpmotors', invThumbnail);














