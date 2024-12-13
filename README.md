# Documentation

## Auth
### POST `/register`
- body
```json
{
    "name": "john",
    "email": "john@mail.com",
    "password": "password"
}
```
- response
```json
{
    "message": "User registered successfully",
    "user": {
        "name": "john",
        "email": "john@mail.com",
        "updated_at": "2024-12-12T23:00:40.000000Z",
        "created_at": "2024-12-12T23:00:40.000000Z",
        "id": 1
    }
}
```

### POST `/login`
- body
```json
{
    "name": "Rendra",
    "email": "rendragituloh@gmail.com",
    "password": "password"
}
```
- response
```json
{
    "message": "Login successful",
    "user": {
        "id": 100,
        "name": "Rendra",
        "email": "rendragituloh@gmail.com",
        "email_verified_at": null,
        "created_at": "2024-12-13T00:15:09.000000Z",
        "updated_at": "2024-12-13T00:15:09.000000Z",
        "status": "Active"
    },
    "token": "TOKEN"
}
```

## Employee Detail

### Create Employee Detail
#### POST `/employee-detail`
- header
```json
{
    "Authorization": "Bearer TOKEN"
}
```
- body
```json
{
    "date_of_birth": "1990-01-01",
    "city": "New York"
}
```

### Get Employee Detail
#### GET `/employee-detail`
- header
```json
{
    "Authorization": "Bearer TOKEN"
}
```

### Update Employee Detail
#### PUT `/employee-detail`
- header
```json
{
    "Authorization": "Bearer TOKEN"
}
```
- body
```json
{
    "date_of_birth": "1990-01-01",
    "city": "New York"
}
```

### Delete Employee Detail
#### POST `/employee-detail`
- header
```json
{
    "Authorization": "Bearer TOKEN"
}
```

## Attendance
### Create Attendance
#### POST `/attendance`
- header
```json
{
    "Authorization": "Bearer TOKEN"
}
```
- body
```json
{
    "type": "clock_in" // clock_in || clock_out
}
```

### Get Attendance
#### GET `/attendance`
- header
```json
{
    "Authorization": "Bearer TOKEN"
}
```

### Get Attendance By ID
#### Get `/attendance/:id`
- header
```json
{
    "Authorization": "Bearer TOKEN"
}
```

### Update Attendance By ID
#### PUT `/attendance/:id`
- header
```json
{
    "Authorization": "Bearer TOKEN"
}
```
- body
```json
{
    "attendance": "DATE",
    "type": "clock_in" // clock_in || clock_out
}
```

### Delete Attendance By ID
#### DELETE `/attendance/:id`
- header
```json
{
    "Authorization": "Bearer TOKEN"
}
```