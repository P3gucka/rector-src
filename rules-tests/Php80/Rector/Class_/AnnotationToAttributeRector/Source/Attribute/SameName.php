<?php

declare(strict_types=1);

namespace Rector\Tests\Php80\Rector\Class_\AnnotationToAttributeRector\Source\Attribute;

use Attribute;

#[Attribute]
final class SameName
{
	public function __construct(
		protected string $param,
	) {
	}
}
