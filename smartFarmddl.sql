CREATE DATABASE IF NOT EXISTS smartFarm;

USE smartFarm;

-- Define the Farm table
CREATE TABLE Farm (
  farmID INT PRIMARY KEY,
  name VARCHAR(255),
  ownerName VARCHAR(255),
  email VARCHAR(255),
  phoneNum VARCHAR(20),
  latitude FLOAT,
  longitude FLOAT
);

-- Define the WeatherSoilData table
CREATE TABLE WeatherSoilData (
  dataID INT PRIMARY KEY,
  sensorID INT,
  timestamp TIMESTAMP,
  temperature FLOAT,
  precipitation FLOAT,
  windSpeed FLOAT,
  humidity FLOAT,
  pHLevel FLOAT,
  nutrientContent FLOAT,
  moistureLevel FLOAT,
  FOREIGN KEY (sensorID) REFERENCES IoTSensor(sensorID)
);

-- Define the Crop table
CREATE TABLE Crop (
  cropID INT PRIMARY KEY,
  cropType VARCHAR(255),
  cropBestCondition INT,
  FOREIGN KEY (cropBestCondition) REFERENCES WeatherSoilData(dataID)
);


-- Define the Field table
CREATE TABLE Field (
  fieldID INT PRIMARY KEY,
  area FLOAT,
  longitude FLOAT,
  latitude FLOAT
);

-- Define the Crops distribution per Field table
CREATE TABLE CropsDistributionPerField (
  cropID INT,
  fieldID INT,
  area FLOAT,
  PRIMARY KEY (cropID, fieldID),
  FOREIGN KEY (cropID) REFERENCES Crop(cropID),
  FOREIGN KEY (fieldID) REFERENCES Field(fieldID)
);

-- Define the IoTSensor table
CREATE TABLE IoTSensor (
  sensorID INT PRIMARY KEY,
  sensorType VARCHAR(255),
  fieldID INT,
  FOREIGN KEY (fieldID) REFERENCES Field(fieldID)
);

-- Define the CommunityForum table
CREATE TABLE CommunityForum (
  forumID INT PRIMARY KEY,
  forumName VARCHAR(255),
  farmID INT,
  FOREIGN KEY (farmID) REFERENCES Farm(farmID)
);

-- Define the ForumPost table
CREATE TABLE ForumPost (
  postID INT PRIMARY KEY,
  content TEXT,
  timestamp TIMESTAMP,
  forumID INT,
  FOREIGN KEY (forumID) REFERENCES CommunityForum(forumID)
);

-- Define the CommunityForumMembers table
CREATE TABLE CommunityForumMembers (
  forumID INT,
  farmID INT,
  PRIMARY KEY (forumID, farmID),
  FOREIGN KEY (forumID) REFERENCES CommunityForum(forumID),
  FOREIGN KEY (farmID) REFERENCES Farm(farmID)
);
