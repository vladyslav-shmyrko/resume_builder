<?php

namespace App\Services;

use App\Exceptions\Http\NotFoundException;

abstract class DatabaseService
{
    /**
     * Get all entries from the model.
     *
     * @return array
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Get paginated list of entries.
     *
     * @param array $fields
     */
    public function paginated(array $fields)
    {
        return $this->model->select($fields)->simplePaginate(15);
    }

    /**
     * Create new entry for the model.
     *
     * @param array $data
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Create new entry for the model.
     *
     * @param array $data
     */
    public function firstOrCreate(array $data)
    {
        return $this->model->firstOrCreate($data);
    }

    /**
     * First or create multiple entries for the model.
     *
     * @param array $data
     */
    public function firstOrCreateMultiple(array $data)
    {
        return array_map(function ($entry) {
            return $this->model->firstOrCreate($entry)->id;
        }, $data);
    }

    /**
     * Find entry by id.
     *
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find(int $id)
    {
        $entry = $this->model->find($id);
        if ($entry == null) {
            throw new NotFoundException();
        }
        return $entry;
    }

    /**
     * Update entry.
     *
     * @param int $id
     * @param array $data
     */
    public function update(int $id, array $data)
    {
        $entry = $this->model->find($id);
        if ($entry == null) {
            throw new NotFoundException();
        }
        $entry->update($data);
    }
}
