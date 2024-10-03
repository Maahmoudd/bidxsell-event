# Mini Event Management API

## Table of Contents

- [Introduction](#introduction)
- [Database Schema](#database-schema)
- [Problem Solving](#problem-solving)
- [API Endpoints](#api-endpoints)
    - [1. Login](#1-login)
    - [2. List Events](#2-list-events)
    - [3. Get Event](#3-get-event)
    - [4. Store Event](#4-store-event)
    - [5. Purchase Tickets](#5-purchase-ticket)
- [Design Patterns](#design-patterns)
- [Docker](#docker)
- [Authentication](#authentication)
- [Postman Collection](#postman-collection)

## Introduction

This project provides a comprehensive suite of APIs for managing events, ticket purchases, and customer notifications. The API includes features for listing events, retrieving event details, purchasing tickets, and sending email reminders to customers.

## Database Schema

### Entities and Attributes

- `events`: id, name, price, date, venue_id
- `venues`: id, name, address
- `tickets`: id, event_id, customer_name, customer_email, number_of_tickets, ticket_type, group_name, special_requests, complimentary_drinks, backstage_access, seat_preference
- `users`: id, name, email, password

## Problem Solving

| Method | Path                        | Description                                      |
|--------|-----------------------------|--------------------------------------------------|
| GET    | /api/number-to-excel-column | Convert a positive integer to Excel column title |
| GET    | /api/caesar-encode          | Encode a string using Caesar cipher with a shift |
| GET    | /api/json-flattener         | Flatten a nested JSON object                     |

## API Endpoints

## Path Table

| Method | Path                  | Description                          |
|--------|-----------------------|--------------------------------------|
| POST   | /api/login            | Authenticate User                    |
| GET    | /api/events           | List All Events                      |
| GET    | /api/events/{id}      | Get Single Event                     |
| POST   | /api/events           | Store New Event                      |
| POST   | /api/purchase-ticket  | Purchase Tickets                     |


### 1. Login

Endpoint: `/api/login`

Description: Authenticate user and generate token

**Headers:**
- Content-Type: "application/json"
- Accept: "application/json"

**Request Body:**
```json
{
    "email": "admin@admin.com",
    "password": "password"
}

```
### 2. List Events

Endpoint: `/api/events`

Description: Lists all the upcoming events

**Headers:**
- Content-Type: "application/json"
- Accept: "application/json"
- Authorization: "Bearer {{token}}"

**Sample Response:**
```json
{
    "data": [
        {
            "id": 1,
            "name": "Sample Event",
            "date": "2024-10-10 18:00:00",
            "venue_id": 1
        },
        {
            "id": 2,
            "name": "Another Event",
            "date": "2024-11-15 20:00:00",
            "venue_id": 2
        }
    ]
}
```

### 3. Get Event

Endpoint: `/api/events/{id}`

Description: gets and event


**Headers:**
- Content-Type: "application/json"
- Accept: "application/json"
- Authorization: "Bearer {{token}}"

**Sample Response:**
```json
{
    "data": {
        "id": 1,
        "name": "Sample Event",
        "date": "2024-10-10 18:00:00",
        "venue_id": 1,
        "tickets": [
            {
                "id": 1,
                "customer_name": "John Doe",
                "number_of_tickets": 2
            }
        ]
    }
}
```

### 4. Store Event

Endpoint: `/api/events`

Description: Create an event


**Headers:**
- Content-Type: "application/json"
- Accept: "application/json"
- Authorization: "Bearer {{token}}"

**Request Body:**
```json
{
    "name": "New Event",
    "date": "2024-10-15 19:00:00",
    "venue_id": 1
}
```

**Sample Response:**
```json
{
    "data": {
        "id": 1,
        "name": "New Event",
        "date": "2024-10-15 19:00:00",
        "venue_id": 1
    }
}
```

### 5. Purchase Ticket

Endpoint: `/api/purchase-ticket`

Description: Purchase tickets

**Headers:**
- Content-Type: "application/json"
- Accept: "application/json"
- Authorization: "Bearer {{token}}"

**Request Body:**
```json
{
    "event_id": 1,
    "ticket_type": "group",
    "number_of_tickets": 2,
    "group_name": "Test Group",
    "special_requests": "Need special seating"
}
```

**Sample Response:**
```json
{
    "data": {
        "id": 1,
        "customer_name": "John Doe",
        "number_of_tickets": 2,
        "ticket_type": "group",
        "group_name": "Test Group",
        "special_requests": "Need special seating"
    }
}
```

## Design Patterns

- Action Design Pattern for handling single responsibility methods
- Service Oriented Architecture (SOA) for handling multiple responsibility methods
- Strategy Design Pattern for handling different ticket categories depending on the ticket type incoming from the client


## Authentication

Authentication With Sanctum

## Postman Collection

To facilitate testing and integration, provide a Postman collection that includes sample requests for each API endpoint, along with expected responses. This will help users understand how to interact with your API.

[Link to Postman Collection](https://documenter.getpostman.com/view/36493973/2sAXxLCa6b) - Update this link once you create the collection.


- BaseUrl: your app link
- bearer_token : the token from login
- In Every Api Body have example about request


# Requirements
- PHP 8.3
- Laravel 11
- MySQL

## Getting Started


## Clone
Clone this repo to your local machine using https://github.com/Maahmoudd/bidxsell-event
and run
```
git clone https://github.com/Maahmoudd/bidxsell-event.git
cd bidxsell-event
cp .env.example .env
composer install
composer dumpautoload
```

# Laravel sail
run  ./vendor/bin/sail up -d to setup environment by docker
```
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
```

## Run Migrations
```bash
 ./vendor/bin/sail artisan migrate --seed
 ````
## Run Queue
```bash
 ./vendor/bin/sail artisan queue:work
 ````
## Run Scheduler
```bash
 ./vendor/bin/sail artisan schedule:run
 ````
## Run Test
```bash
 ./vendor/bin/sail artisan test
 ````
