<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\SecurityCommandCenter;

class AttackPathNode extends \Google\Collection
{
  protected $collection_key = 'attackSteps';
  protected $associatedFindingsType = PathNodeAssociatedFinding::class;
  protected $associatedFindingsDataType = 'array';
  protected $attackStepsType = AttackStepNode::class;
  protected $attackStepsDataType = 'array';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $resource;
  /**
   * @var string
   */
  public $resourceType;
  /**
   * @var string
   */
  public $uuid;

  /**
   * @param PathNodeAssociatedFinding[]
   */
  public function setAssociatedFindings($associatedFindings)
  {
    $this->associatedFindings = $associatedFindings;
  }
  /**
   * @return PathNodeAssociatedFinding[]
   */
  public function getAssociatedFindings()
  {
    return $this->associatedFindings;
  }
  /**
   * @param AttackStepNode[]
   */
  public function setAttackSteps($attackSteps)
  {
    $this->attackSteps = $attackSteps;
  }
  /**
   * @return AttackStepNode[]
   */
  public function getAttackSteps()
  {
    return $this->attackSteps;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setResource($resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return string
   */
  public function getResource()
  {
    return $this->resource;
  }
  /**
   * @param string
   */
  public function setResourceType($resourceType)
  {
    $this->resourceType = $resourceType;
  }
  /**
   * @return string
   */
  public function getResourceType()
  {
    return $this->resourceType;
  }
  /**
   * @param string
   */
  public function setUuid($uuid)
  {
    $this->uuid = $uuid;
  }
  /**
   * @return string
   */
  public function getUuid()
  {
    return $this->uuid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AttackPathNode::class, 'Google_Service_SecurityCommandCenter_AttackPathNode');
