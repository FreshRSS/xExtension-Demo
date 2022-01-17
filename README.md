# xExtension-Demo

This repository contains the code to enable the demo version of FreshRSS at
[demo.freshrss.org](https://demo.freshrss.org).

To install this extension, you must download this repository under the
`./extensions` folder of your own FreshRSS instance.

With Git:

```console
$ git clone https://github.com/marienfressinaud/xExtension-Demo.git /path/to/FreshRSS/extensions
```

Or by downloading the zip archive:

```console
$ curl -o /tmp/xExtension-Demo.zip -L https://github.com/marienfressinaud/xExtension-Demo/archive/main.zip
$ unzip /tmp/xExtension-Demo.zip -d /tmp
$ mv /tmp/xExtension-Demo-main /path/to/FreshRSS/extensions/xExtension-Demo
```

Finally, you should configure a cron task to execute the provided script to
reset the instance every night:

```cron
0 1 * * * www-data sh /path/to/FreshRSS/extensions/xExtension-Demo/scripts/reset.sh > /dev/null
```
