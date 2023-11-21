<?php

namespace App\Domain\Deans\TransferStudentGroup\Actions;

use App\Domain\Deans\TransferStudentGroup\DTO\StoreTransferStudentGroupDTO;
use App\Domain\Deans\TransferStudentGroup\Models\TransferStudentGroup;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreTransferStudentGroupAction
{
    /**
     * @param StoreTransferStudentGroupDTO $dto
     * @return TransferStudentGroup
     * @throws Exception
     */
    public function execute(StoreTransferStudentGroupDTO $dto): TransferStudentGroup
    {
        DB::beginTransaction();
        try {
            $transfer = new TransferStudentGroup();
            $transfer->student_id = $dto->getStudentId();
            $transfer->exit_direction_id = $dto->getExitDirectionId();
            $transfer->transfer_direction_id = $dto->getTransferDirectionId();
            $transfer->exit_group_id = $dto->getExitGroupId();
            $transfer->transfer_group_id = $dto->getTransferGroupId();
            $transfer->date = $dto->getDate();
            $transfer->desc = $dto->getDesc();
            $transfer->academic_year = $dto->getAcademicYear();
            $transfer->status = \request()->status ? request()->status : 0;
            if ($dto->getFile()) {
                $file = $dto->getFile();
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('students/files/', $filename);
                $transfer->file = $filename;
            }
            $transfer->save();


            $student = User::query()
                ->where('id', '=', $dto->getStudentId())
                ->first();


            if ($dto->getTransferGroupId() != null) {
                $student->update([
                    'group_id' => $dto->getTransferGroupId()
                ]);
            }
            if ($dto->getTransferDirectionId() != null) {
                $student->update([
                    'direction_id' => $dto->getTransferDirectionId()
                ]);
            }

            if(\request()->status == 5){
                $student->delete();
            }

            if(\request()->status == 2){
                $student->delete();
            }


        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return $transfer;
    }
}
