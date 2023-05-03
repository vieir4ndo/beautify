import { Request, Response, response } from 'express';

export interface IUserController {

    save(request: Request, response: Response): void;
    getAll(request: Request, response: Response): void;
    getById(request: Request, response: Response): void;
    deleteById(request: Request, response: Response): void;
    updateById(request: Request, response: Response): void;

}