-- Could modify searches to have a broad search (individual button)
-- And a strict search(another button)
-- (value) [Broad Search] [Exact Match]

-- Home Page



-- Videogames Page

-- add to entry
INSERT INTO Videogames (title, releaseDate) 
VALUES
    (:title_input, :releaseDate_input)

-- delete an entry
DELETE FROM Videogames 
WHERE 
    titleID = :titleID_input

-- update an entry based on titleID
UPDATE Videogames
SET
    title = :title_input,
    releaseDate = :releaseDate_input
WHERE
    titleID = :titleID

-- search for based on title and by year
-- :title_input needs % at the end of the string to work
SELECT titleID, title, releaseDate FROM Videogames
WHERE 
    title LIKE :title_input 
OR
    Year(releaseDate) = :year_input

-- get all Videogame ID's, name, and releaseDate to populate Videogames table
SELECT titleID, title, releaseDate FROM Videogames


-- Platforms Page

-- add to entry
INSERT INTO Platforms (platform) 
VALUES
    (:platform_input)

-- delete an entry
DELETE FROM Platforms 
WHERE 
    platformID = :platformID_input

-- update an entry based on platformID
UPDATE Platforms
SET
    platform = :platform_input
WHERE
    platformID = :platformID_input

-- search for based on title and by year
-- :platformID_input needs % at the end of the string to work
SELECT * FROM Platforms
WHERE 
    platform LIKE :platform_input 
OR
    platformID = :platformID_input

-- get all Platforms to populate table
SELECT * FROM Platforms


-- PlattoVids

-- add to entry
INSERT INTO PlatToVids (titleID, platformID) 
VALUES
    (:titleID_input, :platformID_input)

-- delete an entry, requires two inputs
DELETE FROM PlatToVids 
WHERE 
    titleID = :titleID_input
AND
    platformID = :platformID_input

-- my not work based on keys
-- update an entry based on platformID and titleID
UPDATE PlatToVids
SET
    titleID = :titleID_update_input,
    platformID = :platformID_update_input
WHERE
    titleID = :titleID_input
AND
    platformID = :platformID_input

-- search for based on titleID or platformID
SELECT * FROM PlatToVids
WHERE 
    titleID = :titleID_input
OR
    platformID = :platformID_input 

-- get all Platforms to populate table
SELECT * FROM PlatToVids


-- Publishers Page

-- add to entry
INSERT INTO Publishers (titleID, pName) 
VALUES
    (:titleID, :pName)

-- delete an entry
DELETE FROM Publishers 
WHERE 
    publisherID = :publisherID_input

-- update an entry based on titleID
UPDATE Publishers
SET
    titleID = :titleID_input,
    pName = :pName_input
WHERE
    publisherID = :publisherID_input

-- search for publisher based on name or titleID(i.e. they are searching from their videogame)
-- :pName_input needs % at the end of the string to work
SELECT titleID, pName, publisherID FROM Publishers
WHERE 
    pName LIKE :pName_input 
OR
    titleID = :titleID_input

-- get all Publishers to populate the table
SELECT * FROM Publishers


-- Ratings Page

-- add to entry
INSERT INTO Ratings (titleID, rating) 
VALUES
    (:titleID_input, :rating_input)

-- delete an entry
DELETE FROM Ratings 
WHERE 
    ratingID = :ratingID_input

-- update an entry based on ratingID
UPDATE Ratings
SET
    titleID = :titleID_input,
    rating = :rating_input
WHERE
    ratingID = :ratingID_input

-- search for ratings based on rating or titleID(i.e. they are searching from their videogame)
-- :rating_input needs % at the end of the string to work
SELECT * FROM Ratings
WHERE 
    rating LIKE :rating_input 
OR
    titleID = :titleID_input

-- get all Publishers to populate the table
SELECT * FROM Ratings

-- get all character's data to populate a dropdown for associating with a certificate  
SELECT character_id AS pid, fname, lname FROm bsg_people 
-- get all certificates to populate a dropdown for associating with people
SELECT certification_id AS cid, title FROM bsg_cert

-- get all peoople with their current associated certificates to list
SELECT pid, cid, CONCAT(fname,' ',lname) AS name, title AS certificate 
FROM bsg_people 
INNER JOIN bsg_cert_people ON bsg_people.character_id = bsg_cert_people.pid 
INNER JOIN bsg_cert on bsg_cert.certification_id = bsg_cert_people.cid 
ORDER BY name, certificate

-- add a new character
INSERT INTO bsg_people (fname, lname, homeworld, age) VALUES (:fnameInput, :lnameInput, :homeworld_id_from_dropdown_Input, :ageInput)

-- associate a character with a certificate (M-to-M relationship addition)
INSERT INTO bsg_cert_people (pid, cid) VALUES (:character_id_from_dropdown_Input, :certification_id_from_dropdown_Input)

-- update a character's data based on submission of the Update Character form 
UPDATE bsg_people SET fname = :fnameInput, lname= :lnameInput, homeworld = :homeworld_id_from_dropdown_Input, age= :ageInput WHERE id= :character_ID_from_the_update_form

-- delete a character
DELETE FROM bsg_people WHERE id = :character_ID_selected_from_browse_character_page

-- dis-associate a certificate from a person (M-to-M relationship deletion)
DELETE FROM bsg_cert_people WHERE pid = :character_ID_selected_from_certificate_and_character_list AND cid = :certification_ID_selected_from-certificate_and_character_list
>>>>>>> Stashed changes

