# statamic-social-login
[simplesocial login plugin](https://github.com/dmatthams/statamic-social) port for statamic V2.

### Installation

Clone or download the repository and move the "SocialLogin" folder into your `site/addons` folder.


### Usage

You can now use social_login tag like so:

```
{{ social_login }}
```

### Options

The following options are available

- sns
- counter

By default it will show all social buttons but you can filter by sns keywords.

```code
{{ social_login sns="facebook|twitter|pinterest|linkedin|google" }}
```

Counters show as default but you can turn them off with:

```code
{{ social_login sns=“facebook|twitter” counter=“false” }}
```


