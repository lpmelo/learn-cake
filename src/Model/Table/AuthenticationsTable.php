<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Authentications Model
 *
 * @method \App\Model\Entity\Authentication newEmptyEntity()
 * @method \App\Model\Entity\Authentication newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Authentication> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Authentication get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Authentication findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Authentication patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Authentication> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Authentication|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Authentication saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Authentication>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Authentication>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Authentication>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Authentication> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Authentication>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Authentication>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Authentication>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Authentication> deleteManyOrFail(iterable $entities, array $options = [])
 */
class AuthenticationsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('authentications');
        $this->setDisplayField('id_auth');
        $this->setPrimaryKey('id_auth');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('fk_id_user')
            ->requirePresence('fk_id_user', 'create')
            ->notEmptyString('fk_id_user');

        $validator
            ->scalar('token')
            ->maxLength('token', 255)
            ->requirePresence('token', 'create')
            ->notEmptyString('token');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

        return $validator;
    }
}
