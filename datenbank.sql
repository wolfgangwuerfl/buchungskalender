-- Tabelle für Buchungen mit mehreren Räumen
CREATE TABLE buchungen (
  id INT AUTO_INCREMENT PRIMARY KEY,
  datum DATE NOT NULL,
  raum VARCHAR(50) NOT NULL,
  name VARCHAR(100),
  email VARCHAR(100),
  UNIQUE KEY unique_buchung (datum, raum)
);