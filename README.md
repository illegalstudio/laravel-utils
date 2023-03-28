# Laravel Utils

This repository contains a collection of useful classes and traits for Laravel.

It is used mainly for [illegal studio](https://github.com/illegalstudio) projects.

## HasPrefix

This traits can be used to add a prefix to your model's table name.

```php
class MyModel extends Model
{
    use HasPrefix;
    
    protected $prefix = 'my_prefix_';
}
```

Alternatively you can use the `getPrefix` method to set the prefix.

This is useful if you want to set the prefix dynamically.

```php
class MyModel extends Model
{
    use HasPrefix;
    
    public function getPrefix()
    {
        return config('my.prefix');
    }
}
```
