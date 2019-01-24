-- Rolle som kan gi brukere rettigheter
CREATE ROLE brukere; -- Lager rollen
GRANT SELECT, UPDATE, INSERT, DELETE ON bruker TO brukere; -- Gir rollen rettigheter til å lese, endre, sette inn, slette innhold i tabell
GRANT SELECT, UPDATE, INSERT, DELETE ON tråd TO brukere;
GRANT SELECT, UPDATE, INSERT, DELETE ON post TO brukere;
GRANT SELECT, UPDATE, INSERT, DELETE ON grupper TO brukere;






