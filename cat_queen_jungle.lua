local streets = {}

function reclaimStreets(streetName)
  if not streets[streetName] then
    streets[streetName] = {
      visitors = 0
    }
  end

  streets[streetName].visitors = streets[streetName].visitors + 1
  print("Welcome to " .. streetName .. "!")
end

function reportStreetVisitors()
  for streetName, data in pairs(streets) do
    local visitors = data.visitors
    print("On " .. streetName .. " we have had " .. visitors .. " visitors.")
  end
end

function cleanStreets(streetName)
  if streets[streetName] then
    streets[streetName].cleaned = true
    print(streetName .. " is now clean.")
  else
    print("No such street in records.")
  end
end

function reportCleanStreets()
  for streetName, data in pairs(streets) do
    if data.cleaned then
      print("Cleaned: " .. streetName)
    end
  end
end

function findStreetVisitor(visitorName)
  for streetName, data in pairs(streets) do
    if data.visitorName == visitorName then
      print("Found visitor " .. visitorName .. " on " .. streetName .. ".")
      return
    end
  end
  print("Could not find " .. visitorName .. " on any of our streets.")
end

function registerVisitor(streetName, visitorName)
  if not streets[streetName] then
    streets[streetName] = {
      visitors = 0
    }
  end
  streets[streetName].visitorName = visitorName
  print("Registered " .. visitorName .. " to " .. streetName .. ".")
end

function reportRegisteredVisitors()
  for streetName, data in pairs(streets) do
    if data.visitorName then
      print("Registered visitor found: " .. data.visitorName .. " on " .. streetName .. ".")
    end
  end
end

function unlockStreets(streetName)
  if not streets[streetName] then
    streets[streetName] = {
      visitors = 0
    }
  end
  streets[streetName].locked = false
  print("Unlocked " .. streetName .. ".")
end

function reportUnlockedStreets()
  for streetName, data in pairs(streets) do
    if not data.locked then
      print("Unlocked: " .. streetName)
    end
  end
end

function trackStreetVisitor(streetName, visitorName)
  if not streets[streetName] then
    streets[streetName] = {
      visitors = 0
    }
  end
  streets[streetName].visitorName = visitorName
  print("Tracking " .. visitorName .. " on " .. streetName .. ".")
end

function reportTrackedVisitors()
  for streetName, data in pairs(streets) do
    if data.visitorName then
      print("Tracked visitor found: " .. data.visitorName .. " on " .. streetName .. ".")
    end
  end
end

function lockDownStreets(streetName)
  if not streets[streetName] then
    streets[streetName] = {
      visitors = 0
    }
  end
  streets[streetName].locked = true
  print("Locked down " .. streetName .. ".")
end

function reportLockedStreets()
  for streetName, data in pairs(streets) do
    if data.locked then
      print("Locked: " .. streetName)
    end
  end
end

function evacuateStreets(streetName)
  if not streets[streetName] then
    streets[streetName] = {
      visitors = 0
    }
  end
  streets[streetName].visitors = 0
  print("Evacuated " .. streetName .. ".")
end

function reportEvacuatedStreets()
  for streetName, data in pairs(streets) do
    if data.visitors == 0 then
      print("Evacuated: " .. streetName)
    end
  end
end

function liberateStreets(streetName)
  if not streets[streetName] then
    streets[streetName] = {
      visitors = 0
    }
  end
  streets[streetName].liberated = true
  print("Liberated " .. streetName .. ".")
end

function reportLiberatedStreets()
  for streetName, data in pairs(streets) do
    if data.liberated then
      print("Liberated: " .. streetName)
    end
  end
end