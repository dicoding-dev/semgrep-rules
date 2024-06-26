<?php

class TestRedirect implements \Dicoding\Web\Http\Responsable {
    public function __construct(private \Illuminate\Routing\Redirector $redirector)
    {}

    public function unsafeRedirect1($payload)
    {
        // ruleid: unsafe-payload-output
        return $this->redirector->route('resetpasswordform', $payload->getOutput());
    }

    public function unsafeRedirect2($payload)
    {
        // ruleid: unsafe-payload-output
        return Redirect::route(
            'resetpasswordform',
            $payload->getOutput()
        );
    }

    public function unsafeRedirect3($payload)
    {
        $output = $payload->getOutput();

        // ruleid: unsafe-payload-output
        return $this->redirector->route('resetpasswordform', $output);
    }

    public function safeRedirect1($payload)
    {
        $output = $payload->getOutput();

        // ok: unsafe-payload-output
        return $this->redirector->route('resetpasswordform', $output['id']);
    }

    public function safeRedirect2($payload)
    {
        // ok: unsafe-payload-output
        return $this->redirector->route('resetpasswordform', $payload->getOutput()['id']);
    }
}
