> 目标：增加一个Params注解

1、app目录下，创建 Anotation\Params.php

```text
namespace App\Anotation;

use Hyperf\Di\Annotation\AbstractAnnotation;

/**
 * @Annotation
 * @Target({"METHOD"})
 */
class Params extends AbstractAnnotation
{
    /**
     * @var string
     */
    public $name;

    /**
     * 是否必传
     * @var bool
     */
    public $isRequire = true; 

    /**
     * 传参方法
     * @var string
     */
    public $method; 

    /**
     * 提示消息
     * @var null|string
     */
    public $msg; 
}
```

2、创建 解析该注解的切面 Aspect\ParamsAnnotationAspect.php

```text
namespace App\Aspect;

use App\Anotation\Params;

use Hyperf\Di\Aop\AbstractAspect;
use Hyperf\Di\Aop\ProceedingJoinPoint;
use Hyperf\Utils\Traits\Container;

class ParamsAnnotationAspect extends AbstractAspect
{
    use Container;

    public $annotations = [
        Params::class,
    ];

    public function process(ProceedingJoinPoint $proceedingJoinPoint)
    {
        $metadata = $proceedingJoinPoint->getAnnotationMetadata();

        /** @var Params $annotation */
        $annotation = $metadata->method[Params::class] ?? null;
        // 处理该注解

        return $proceedingJoinPoint->process();
    }
}
```

3、配置 config\autoload\aspects.php 加上 \App\Aspect\ParamsAnnotationAspect::class
