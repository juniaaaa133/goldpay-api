<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'balance' => $this->amount ,
            'from_account' => $this->from_account,
            'to_account' => $this->to_account,
            'transfer_date' => $this->transfer_date,
        ];
    }
}
