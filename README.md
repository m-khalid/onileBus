# Dynamic Query & Search System
>A fully dynamic query and search platform built with Django, designed to eliminate developer involvement for new reports or queries.- Users can register in application
##Layers:

#### Admin Dashboard (Configuration Layer):

- Configure databases, tables, columns, joins, filters, and limits.

- Customize search and result screens dynamically.

#### User Interface (Execution Layer):

- End users can perform searches and view results based on admin configurations.

- Query screens and result views are generated automatically.

## Requirements:
1. Python: 3.10+
2. Django: 4.x or higher
3. PostgreSQL: 12+

## Installation :

```
python -m venv venv
```
```
venv\Scripts\activate
```
```
venv\Scripts\activate
```
```
django-admin --version
```
```
pip install django djangorestframework pillow
```
```
django-admin startproject reports
```
```
python manage.py migrate
```
```
pip install django-autocomplete-light
```
```
python manage.py runserver
```
## Usage:
- go to
```
http://127.0.0.1:8000/pages/reports/
http://127.0.0.1:8000/admin/pages/report/
```


