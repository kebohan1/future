# Future API

> ### GET /gps
* #### request
    - ##### HTTP method:GET
    - ##### parameters
        + token: string , your api token(need to request)
        + uid: string(9), user id
        + password: string, user password
* #### response
    + id: unsigned integer, this raw id
    + longitude: float(9,6), this gps info longitude
    + latitude: float(8,6), this gps info latitude
    + uid: unsigned integer, user id
    + created_at: date, this gps create time
    + updated_at: date, this gps update time
