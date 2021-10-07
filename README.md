# ClientAccountSelfRegistration-AugustusTest

## IMPORTANT NOTES
# Test was run on WAMP Server
# Google Maps Api Key is used in the .env
# If API Registeration fails, register through the browser on http://localhost/register

These are the Project Files

Tasks Accomplished:

"GOAL" achieved as "two endpoints" have been created to retrieve a JSON response through the API.

To retrieve All Registered Users: http://localhost/public/api/user (Retrieves the table user only)

To retrieve All Registered Clients: http://localhost/public/api/client (Retrieves the table client & users joined on client_id and user_id)

## POST Regsiter Tasks

To register, the endpoint http://127.0.0.1:8000/register

Validation has been applied to all fields 

Lattitude and Longitude fields are populated with the values retrieved from the User's Input in Address field using the "GEOCODE API"

Caching Data to REDIS "NOT DONE"

"Start Validity" retrieves the current timestamp (date & time), however, "End Validity" should show a date 15 days later, but failed (probably due to syntax)

"last_password_reset" has current date-time assigned

## GET /account endpoint Tasks

To retrieve All Registered Users: http://127.0.0.1:8000/api/user (Retrieves the table user only)

To retrieve All Registered Clients: http://127.0.0.1:8000/api/client (Retrieves the table client

## RECORDS ARE NOT FILTERED OR PAGINATED
